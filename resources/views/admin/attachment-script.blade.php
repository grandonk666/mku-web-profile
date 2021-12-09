<script>
  (function() {
    // var HOST = "http://localhost:8000/upload"; //pass the route

    addEventListener("trix-attachment-add", function(event) {
      if (event.attachment.file) {
        uploadFileAttachment(event.attachment)
      }
    })

    addEventListener("trix-attachment-remove", function(event) {
      deleteAttachment(event);
    })

    function uploadFileAttachment(attachment) {
      uploadFile(attachment.file, setProgress, setAttributes)

      function setProgress(progress) {
        attachment.setUploadProgress(progress)
      }

      function setAttributes(attributes) {
        attachment.setAttributes(attributes)
      }
    }

    function uploadFile(file, progressCallback, successCallback) {
      const token = "{{ csrf_token() }}"
      const uploadEndpoint = "{{ route('admin.attachment.add') }}"
      var formData = createFormData(file);
      var xhr = new XMLHttpRequest();

      xhr.open("POST", uploadEndpoint, true);
      xhr.setRequestHeader('X-CSRF-TOKEN', token);
      xhr.setRequestHeader("Accept", "application/json");

      xhr.upload.addEventListener("progress", function(event) {
        var progress = event.loaded / event.total * 100
        progressCallback(progress)
      })

      xhr.addEventListener("load", function(event) {
        const data = JSON.parse(xhr.responseText);
        var attributes = {
          url: data.url,
          href: data.url
        }

        @if (!isset($model_type))
          createHTMLInput(data.filename)
        @endif

        successCallback(attributes)
      })

      xhr.send(formData)
    }

    function createHTMLInput(value) {
      const form = document.querySelector("#form");
      const input = document.createElement("input");

      input.type = "hidden"
      input.name = "attachments[]"
      input.value = value

      form.appendChild(input);
    }

    function removeHTMLInput(value) {
      const input = document.querySelector(`input[value='${value}']`);
      if (input) {
        input.remove();
      }
    }

    function createFormData(file) {
      var data = new FormData()
      data.append("Content-Type", file.type)
      data.append("file", file)

      @if (isset($model_id))
        data.append("model_id", '{{ $model_id }}')
      @endif
      @if (isset($model_type))
        data.append("model_type", '{{ $model_type }}')
      @endif

      return data
    }

    function deleteAttachment(event) {
      const token = "{{ csrf_token() }}"
      const deleteEndpoint = '{{ route('admin.attachment.remove') }}'
      console.log(event.attachment);
      let attachment = event.attachment;

      let url = attachment.attachment.attributes.values.url.split('/');
      console.log(url)
      // console.log(`${url[1]}/${url[2]}`);
      let previewURL = `${url[4]}/${url[5]}`;

      if (previewURL && deleteEndpoint) {
        let form = new FormData;
        form.append('image', previewURL);

        @if (isset($model_id))
          form.append("model_id", '{{ $model_id }}')
        @endif
        @if (isset($model_type))
          form.append("model_type", '{{ $model_type }}')
        @endif

        xhr = new XMLHttpRequest;
        xhr.open('POST', deleteEndpoint, true);
        xhr.setRequestHeader('X-CSRF-Token', token);

        xhr.upload.onprogress = function(event) {
          var progress = event.loaded / event.total * 101;
          return attachment.setUploadProgress(progress);
        };

        xhr.onload = function() {
          if (this.status >= 200 && this.status < 300) {
            var data = JSON.parse(this.responseText);
            console.log(data.filename)

            @if (!isset($model_type))
              removeHTMLInput(data.filename)
            @endif
            return '';
          }
        };

        return xhr.send(form);
      }
    }
  })();
</script>
