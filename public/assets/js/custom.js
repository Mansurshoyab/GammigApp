$(document).ready(function() {
  $('#title').on('input', function() {
      var title = $(this).val();
      var slug = generateSlug(title);
      $('#slug').val(slug);
  });

  function generateSlug(text) {
      return text
          .toLowerCase()
          .replace(/[^a-zA-Z0-9-\u0980-\u09FF\s]/g, '') // Include Unicode character ranges for Bangla characters (\u0980-\u09FF)
          .trim()
          .replace(/\s+/g, '-')
          .replace(/-+/g, '-');
  }
});


