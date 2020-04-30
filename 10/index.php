<?php
spl_autoload_register(function ($className) {
    include $className . ".php";
});

tryCatchException();

function tryCatchException() {

    $throwExceptions = new Main();

    for ($i = 1; $i <= 4; $i++) {
        try {
            switch ($i) {
                case 1:
                    $throwExceptions->throwException1();
                    break;
                case 2:
                    $throwExceptions->throwException2();
                    break;
                case 3:
                    $throwExceptions->throwException3();
                    break;
                case 4:
                    $throwExceptions->throwException4();
                    break;
            }
        } catch (\exception\Exception1 $e) {
            print "Exception number: " . $e->getMessage() . "<br>";
        } catch (\exception\Exception2 $e) {
            print "Exception number: " . $e->getMessage() . "<br>";
        } catch (\exception\Exception3 $e) {
            print "Exception number: " . $e->getMessage() . "<br>";
        } catch (\exception\Exception4 $e) {
            print "Exception number: " . $e->getMessage() . "<br>";
        } catch (\exception\Exception5 $e) {
            print "Exception number: " . $e->getMessage() . "<br>";
        }
    }
}

?>
