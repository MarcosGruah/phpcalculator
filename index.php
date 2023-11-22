<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Calculator</title>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mt-5">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="input-group mb-3">
                        <input class="form-control" type="text" name="num1" placeholder="Number One">
                        <select class="text-start input-group-text" name="operator">
                            <option value="add">+</option>
                            <option value="subtract">-</option>
                            <option value="multiply">*</option>
                            <option value="divide">/</option>
                        </select>
                        <input class="form-control" type="text" name="num2" placeholder="Number Two">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>