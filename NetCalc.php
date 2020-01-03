<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Tax-Calculator</title>
    <link rel="stylesheet" type="text/css" href="StyleSheet1.css" />
</head>
    <body>
        <div id="wrapper">
            <header>
                    <h1>
                        Net Calculator for German Students
                    </h1>
            </header>
            <main>
                <article title="tax-calculator-body">
                    <section title="information">
                        <div class="info-body">
                            <h2>About</h2>
                            <p class="text-center">
                                Figuring out how much tax one has to pay can be rather <strong>time consuming</strong>. This calculator is designed for students in Germany <br />
                                to get a gist of how much money they get to keep when they're trying to earn a little extra. There isn't much information <br />
                                required as the calculator assumes an average <strong>university student</strong>. Enjoy and try not to cry when you see the results.
                            </p>
                            <img src="images/tax.jfif" width="600" height="600" alt="tax picture" />
                            <br />
                            <h2>Form</h2>
                        </div>
                    </section>
                    <section title="tax-form">

                        <!--PHP handling input-->
                        <?php
                        $salary = "";
                        $salary_error = "";
                        $error = false;
                        $brutto = 0;
                        $factor = 0.64;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["salary"])) {
                                $salary_error = "Salary is required";
                                $error = true;
                            }   else {
                            $salary = $_POST["salary"];
                            }
                        }
                        ?>

                        <form action="" method="POST">
                            <div class="input-area">
                                <p class="input-text">Annual Gross Salary:</p>
                                <div class="error-wrap">
                                    <input class="input-field" type="number" placeholder="Annual Gross Salary" name="salary" />
                                    <span class="error"><?php if(empty($_POST["salary"])) {echo '* ', $salary_error;}?></span>
                                </div>
                                <button type="submit" id="submit-button" value="Calculate Now">Calculate Now</button> <br />
                            </div>
                        </form>                   
                    </section>
                    <section name="results">
                        <div class="result-table">
                              <?php
                                        if (!$error) {
                                            
                                            $brutto = $salary * $factor;

                                            echo "<h2>Alright, here are your results:</h2>";
                                            echo "<p>Your salary is</p>";
                                            echo "<p>$salary</p>";
                                            echo "<p>Your Gross Salary: </p>";
                                            echo "<p>$brutto</p>";
                                        }
                              ?>
                         </div>
                    </section>
                </article>
            </main>
        </div>
    </body>
</html>