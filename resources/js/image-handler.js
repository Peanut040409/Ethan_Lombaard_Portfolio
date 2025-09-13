  const input = document.getElementById('imageInput');
  const preview = document.getElementById('preview');
  const imageLabel = document.getElementById('imageLabel');
  input.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      // Option A: Read it as a Data URL (base64)
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result; // displays the image
      };
      reader.readAsDataURL(file);

      imageLabel.innerHTML =`
        Name: ${file.name} <br>
        Size: ${(file.size/1024/1024).toFixed(2)} mb
      `;

      if ((file.size/1024/1024) > 5) {
        alert("The file size is above the reccomended limit.");
      }

      if (!file.type.startsWith('image/')) {
        alert("The file type is not an image. Please select an image.");
      }

      // Option B: You can also just create an object URL
      // preview.src = URL.createObjectURL(file);
    }
  });

