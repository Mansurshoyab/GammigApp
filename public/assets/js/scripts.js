$(document).ready(function() {
    $('#title').on('input', function() {
      var title = $(this).val();
      var slug = generateSlug(title);
      $('#slug').val(slug);
    });
      
    function generateSlug(text) {
      return text
        .toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
    }
  
    $('.select-field').select2({
      theme: 'bootstrap-5'
    });
});

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
