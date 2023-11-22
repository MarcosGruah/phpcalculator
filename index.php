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
            <div class="col-md-6 mt-5">
                <h1 class="text-center mb-3">Calculator</h1>
                <form class="mb-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="input-group mb-3">
                        <input class="form-control" type="number" name="num1" placeholder="Number One">
                        <select class="text-start input-group-text" name="operator">
                            <option value="add">+</option>
                            <option value="subtract">-</option>
                            <option value="multiply">*</option>
                            <option value="divide">/</option>
                        </select>
                        <input class="form-control" type="number" name="num2" placeholder="Number Two">
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
                    $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
                    $operator = htmlspecialchars($_POST["operator"]);

                    // Error handlers
                    $errors = false;

                    // Check if variables are not null, allows for 0 to be passed unlike empty()

                    if (!isset($num1) || !isset($num2) || empty($operator)) {
                        echo '<div class="alert alert-danger" role="alert">
                            Fill all the input fields.
                          </div>';
                        $errors = true;
                    }

                    // Only allows numbers

                    if (!is_numeric($num1) || !is_numeric($num2)) {
                        echo '<div class="alert alert-danger" role="alert">
                        Fill all the input fields.<br>Only use numbers for the input fields.
                          </div>';
                        $errors = true;
                    }

                    // Calculate the numbers if no errors.
                    if (!$errors) {
                        $result = 0;
                        switch ($operator) {
                            case 'add':
                                $result = $num1 + $num2;
                                break;
                            case 'subtract':
                                $result = $num1 - $num2;
                                break;
                            case 'multiply':
                                $result = $num1 * $num2;
                                break;
                            case 'divide':
                                // Checks for division by 0.
                                if ($num2 != 0) {
                                    $result = $num1 / $num2;
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">
                                            Cannot divide by zero.
                                          </div>';
                                    $errors = true;
                                }
                                break;
                            default:
                                echo '<div class="alert alert-danger" role="alert">
                                    Invalid Operator.
                                  </div>';
                                break;
                        }

                        if (!$errors) {
                            echo '<div class="fs-2 text-center alert alert-success" role="alert">
                                    Result = ' . $result . '
                                  </div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

</body>

</html>