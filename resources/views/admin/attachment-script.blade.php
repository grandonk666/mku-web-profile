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
      const uploadEndpoint = '{{ route("admin.attachment-upload") }}'
      var formData = createFormData(file);
      var xhr = new XMLHttpRequest();
       
      xhr.open("POST", uploadEndpoint, true);
      xhr.setRequestHeader( 'X-CSRF-TOKEN', token );
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
          successCallback(attributes)
      })

      xhr.send(formData)
  }

  function createFormData(file) {
      var data = new FormData()
      data.append("Content-Type", file.type)
      data.append("file", file)
      return data
  }

  function deleteAttachment(event) {
    const token = "{{ csrf_token() }}"
    const deleteEndpoint = '{{ route("admin.attachment-remove") }}'
        console.log(event.attachment);
        let attachment = event.attachment;

        let url = attachment.attachment.attributes.values.url.split('/');
        console.log(url)
        // console.log(`${url[1]}/${url[2]}`);
        let previewURL = `${url[4]}/${url[5]}`;

        if (previewURL && deleteEndpoint) {
            let form = new FormData; 
            form.append('image', previewURL);

            xhr = new XMLHttpRequest;
            xhr.open('POST', deleteEndpoint, true);
            xhr.setRequestHeader('X-CSRF-Token', token);

            xhr.upload.onprogress = function(event) {
                var progress = event.loaded / event.total * 101;
                return attachment.setUploadProgress(progress);
            };

            xhr.onload = function() {
                if (this.status >= 201 && this.status < 300) {
                    var data = JSON.parse(this.responseText);
                    return '';
                }
            };

            return xhr.send(form);
        }
    }
})();
</script>