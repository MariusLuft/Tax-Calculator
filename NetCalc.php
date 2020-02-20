<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Tax-Calculator</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="StyleSheet1.css" />
   
</head>
    <body>
        <div id="wrapper">            
            <header>      
                <h1>
                        Tax calculator
                </h1> 
                <img src="images/treasure.jpg" alt="treasure" id="treasure" >
            </header>
            <main>
                <article title="tax-calculator-body">
                    <section title="information" id="information">
                        <div class="info-body">
                            <h2>About</h2>
                            <p class="text-center">
                                Figuring out how much tax one has to pay can be rather <strong>time consuming</strong>. This calculator is designed for students in Germany <br />
                                to get a gist of how much money they get to keep when they're trying to earn a little extra. There isn't much information <br />
                                required as the calculator assumes an average <strong>university student</strong>. Enjoy and try not to cry when you see the results.
                            </p>      
                             <br/> <br/>  <br/>  <br/>
                        </div>
                    </section>
                    <section title="tax-form" id="tax-form">
                        <br/>
                        <h2 class="h2-black">Form</h2>
                        <!--PHP handling input-->
                        <?php
                        $salary = 0;
                        $salary_error = "";
                        $error = false;
                        $netto = 0;
                        $factor = 0.64;
                        $difference = 0;


                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["salary"])) {
                                $salary_error = "Salary is required";
                                $error = true;
                            }   else {
                            $salary = $_POST["salary"];
                            }
                        }
                        ?>

                        <form action="NetCalc.php#bottom-anchor" method="POST">

                            <div class="input-area">
                                <p class="input-text">Annual Gross Salary:</p>
                                <div class="error-wrap">
                                    <input class="input-field" type="number" placeholder="Annual Gross Salary" name="salary" />
                                    <span class="error"><?php if(empty($_POST["salary"])) {echo '* ', $salary_error;}?></span>
                                </div> <a id='bottom-anchor'></a>
                                <button type="submit" id="submit-button" value="Calculate Now" class="btn btn-outline-dark">Calculate Now</button> <br />

                            </div>
                        </form>                   
                    </section>
                    <section name="results">
                        <div class="result-table">
                              <?php
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        if (!$error) {
                                            
                                            $netto = $salary * $factor;
                                            $difference = $salary - $netto;

                                            echo "<h2 class='h2-black'>Results:</h2>";
                                            echo "<table id='myTable'><tr id='golden-row'><th>Gross</th><th>Net</th><th>Tax</th></tr><tr><th>$salary</th><th>$netto</th><th>$difference</th></tr></table>";
                                        }
                                    }

                              ?>
                         </div>
                    </section>
                </article>
            </main>
        </div>
    </body>
</html>