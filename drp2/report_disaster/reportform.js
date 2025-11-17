document.getElementsByClassName('reporting_form')[0].addEventListener('submit', async function (e) {
    e.preventDefault();

    let userConfirmed = confirm("Are you sure you want to submit this report?");
    if (!userConfirmed) {
        return; // Stop execution if user clicks 'Cancel'
    }

    let formData = new FormData(this);

    try {
        let response = await fetch('../report_disaster/reportBackend.php', {
            method: 'POST',
            body: formData
        });

        let data = await response.json(); 
        if (data.status === "success") {
            let title = formData.get('title');
            alert("Report submitted successfully!\nTitle: " + title);
            window.location.href = "../home/home.php";

            fetchReports(); 
        } else {
            alert("Error: " + data.message);
        }
    } catch (error) {
        console.error("Fetch error:", error);
    }
});
