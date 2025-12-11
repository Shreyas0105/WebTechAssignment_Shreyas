$(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        e.preventDefault();

        // Basic Validation (HTML5 handles most, but we can add more here)
        let isValid = true;
        $(this).find('input, textarea, select').each(function() {
            if (!$(this).val()) {
                isValid = false;
                $(this).addClass('error');
            } else {
                $(this).removeClass('error');
            }
        });

        if (!isValid) {
            alert('Please fill in all fields.');
            return;
        }

        // Collect form data
        var formData = $(this).serialize();

        // Button loading state
        var $btn = $('#submitBtn');
        var originalText = $btn.text();
        $btn.text('Registering...').prop('disabled', true);

        // AJAX Submission
        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: formData,
            success: function(response) {
                // Hide form and show result
                $('#registrationForm').slideUp();
                $('#resultContainer').html(response).removeClass('hidden');
            },
            error: function() {
                alert('An error occurred. Please try again.');
                $btn.text(originalText).prop('disabled', false);
            }
        });
    });
});
