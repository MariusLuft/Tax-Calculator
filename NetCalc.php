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
                        $year = "";
                        $state = "";
                        $salary_error = "";
                        $year_error = "";
                        $error = false;
                        $brutto = 0;
                        $factor = 0;

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["salary"])) {
                                $salary_error = "Salary is required";
                                $error = true;
                            }   else {
                            $salary = $_POST["salary"];
                            }
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["year"])) {
                                $year_error = "Year is required";
                                $error = true;
                            }   else {
                            $year = $_POST["year"];
                            }
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $state = $_POST["state"];
                        }

                        ?>



                        <form action="" method="POST">
                            <div class="input-area">
                                <p class="input-text">Annual Gross Salary:</p>
                                <div class="error-wrap">
                                    <input class="input-field" type="number" placeholder="Annual Gross Salary" name="salary" />
                                    <span class="error"><?php if(empty($_POST["salary"])) {echo '* ', $salary_error;}?></span>
                                </div>
                                <p class="input-text">Year:</p>
                                <div class="error-wrap">
                                    <input class="input-field" type="number" min="2018" max="2020" placeholder="Year" name="year" />
                                    <span class="error"><?php if(empty($_POST["year"])) {echo '* ', $year_error;}?></span>
                                </div>
                                <p class="input-text">State:</p>
                                <select class="input-field" type="text" placeholder="State" name="state">
                                    <option value="Sachsen">Sachsen</option>
                                    <option value="Thueringen">Thueringen</option>
                                    <option value="Sachsen-Anhalt">Sachsen-Anhalt</option>
                                    <option value="Niedersachsen">Niedersachsen</option>
                                    <option value="Meckelenburg-Vorpommern">Meckelenburg-Vorpommern</option>
                                    <option value="Bremen">Bremen</option>
                                    <option value="Hamburg">Hamburg</option>
                                    <option value="Bayern">Bayern</option>
                                    <option value="Rheinland Pfalz">Rheinland Pfalz</option>
                                    <option value="Saarland">Saarland</option>
                                    <option value="Schlesswig-Holstein">Schlesswig-Holstein</option>
                                    <option value="Hessen">Hessen</option>
                                    <option value="Baden-Württemberg">Baden-Württemberg</option>
                                    <option value="Berlin">Berlin</option>
                                    <option value="Brandenburg">Brandenburg</option>
                                    <option value="Nordrhein-Westfalen">Nordrhein-Westfalen</option>
                                </select>
                                <button type="submit" id="submit-button" value="Calculate Now">Calculate Now</button> <br />
                            </div>
                        </form>                   
                    </section>
                    <section name="results">
                        <div class="result-table">
                              <?php
                                        if (!$error) {

                                            echo "<h2>Alright, here are your results:</h2>";
                                            echo "<p>Your salary is</p>";
                                            echo "<p>$salary</p>";
                                            echo "<p>The year is</p>";
                                            echo "<p>$year</p>";
                                            echo "<p>The state is</p>";
                                            echo "<p>$state</p>";
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