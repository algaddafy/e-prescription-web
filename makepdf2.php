<!DOCTYPE html>
<html>

<head>
    <title>Download PDF using PHP from HTML Link</title>
    <script></script>
</head>

<body id="formConfirmation">
    <center>
        <h2 style="color:green;">Welcome To GFG</h2>
        <p><b>Click below to download PDF</b>
        </p>
        <input class="btn btn-danger" type="submit" value"Print" onClick="onClick()">
    </center>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<script>
    function onClick() {
        var pdf = new jsPDF('p', 'pt', 'letter');
        pdf.canvas.height = 72 * 11;
        pdf.canvas.width = 72 * 8.5;

        pdf.fromHTML(document.body);

        pdf.save('<?php echo "hello_" ?>test.pdf');
    };

    var element = document.getElementById("clickbind");
    element.addEventListener("click", onClick);
</script>