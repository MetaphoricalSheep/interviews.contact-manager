$(document).ready(function() {
    $(document).on('submit', '.search-form', function() {
        var keyword = $('.search-form #search-form-keyword').val();
        window.location.replace('/contacts/' + keyword);
        
        return false;
    });
});
