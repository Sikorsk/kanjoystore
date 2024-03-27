document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('comment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(form); // Create FormData object from form

        // Send form data using AJAX
        fetch(form.getAttribute('action'), {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Handle the response if needed
            console.log(data);
            // Assuming you have a function to add the comment to the page dynamically
            // You can call that function here passing the newly added comment data
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
