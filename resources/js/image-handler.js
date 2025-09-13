  const input = document.getElementById('imageInput');
  const preview = document.getElementById('preview');

  input.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      // Option A: Read it as a Data URL (base64)
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result; // displays the image
      };
      reader.readAsDataURL(file);

      // Option B: You can also just create an object URL
      // preview.src = URL.createObjectURL(file);
    }
  });

