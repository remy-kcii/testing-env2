<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturing the form inputs using the correct field names
    $fullName = htmlspecialchars($_POST['name']); // Captures the name input from the form
    $email = htmlspecialchars($_POST['email']);
    $position = htmlspecialchars($_POST['position']); // Position input
    $contact = htmlspecialchars($_POST['contact']); // Contact number input
    $coverLetter = htmlspecialchars($_POST['coverletter']); // Cover letter input
    $cv = $_FILES['cv']['name']; // CV file input
    
    // Your email address to receive the submission
    $to = 'careers@rw.Andersen.com';
    $subjectToAdmin = 'New Job Application Submission';
    
    // Message to be sent to the admin
    $messageToAdmin = "You have received a new job application:\n\n".
        "Position: $position\n".
        "Full Name: $fullName\n".
        "Email: $email\n".
        "Contact Number: $contact\n".
        "Cover Letter:\n$coverLetter\n".
        "CV: $cv\n";
    
    // Admin email headers
    $headersToAdmin = "From: careers@rw.Andersen.com\r\nReply-To: careers@rw.Andersen.com\r\n";
    
    // Send notification to admin
    if (mail($to, $subjectToAdmin, $messageToAdmin, $headersToAdmin)) {
        // Acknowledgment email to the applicant
        $subjectToVisitor = 'Thank You for Your Application';
        $messageToVisitor = "Dear $fullName,\n\n".
            "Thank you for applying for the position of $position. We have received your application and will review it shortly.\n\n".
            "Kind regards,\n".
            "Recruitment Team,\n".
            "Andersen Rwanda";
        $headersToVisitor = "From: careers@rw.Andersen.com\r\nReply-To: careers@rw.Andersen.com\r\n";
        
        // Send acknowledgment email
        mail($email, $subjectToVisitor, $messageToVisitor, $headersToVisitor);
        
        // Redirect to thank you page
        header("Location: thank_you_careers.html");
        exit();
    } else {
        echo "There was an error submitting your application. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
