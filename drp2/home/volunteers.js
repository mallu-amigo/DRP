let volunteerForm = document.getElementById('volunteer_form');
if (volunteerForm) {
    volunteerForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        let userConfirmed = confirm("Are you sure you want to submit?");
        if (!userConfirmed) {
            return; // Stop execution if user clicks 'Cancel'
        }

        let formData = new FormData(this);

        try {
            let response = await fetch('../home/volunteers.php', {
                method: 'POST',
                body: formData
            });

            let data = await response.text(); 
            alert(data);
        } catch (error) {
            console.error("Fetch error:", error);
        }
    });
}
