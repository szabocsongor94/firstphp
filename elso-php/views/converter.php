<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="card w-25 m-auto p-3">
        <form action="/penzvalto" method="GET">
            <input class="form-control mb-2" type='number' name="mennyit" value="<?php echo $value ?>">
            <select name="mirol" class="form-control mb-2">
                <?php foreach ($currencies as $currency) { ?>
                    <option value="<?php echo $currency['label']?>" <?php echo $sourceCurrency === $currency['label'] ? 'selected' : '' ?>>
                        <?php echo $currency['name'] ?> <?php echo $currency["symbol"] ?>
                    </option>
                <?php } ?>

            </select>

                    <h1 class="text-center">
                        <?php echo number_format($vegeredmeny, 2, ',', '' ) ?>
                    </h1>
            

            <select name="mire" class="form-control mb-2">
                <?php foreach ($currencies as $currency) { ?>
                    <option value="<?php echo $currency['label']?>" <?php echo $targetCurrency === $currency['label'] ? 'selected' : '' ?>>
                        <?php echo $currency['name'] ?> <?php echo $currency["symbol"] ?>
                    </option>
                <?php } ?>

            </select>
            
            <input type="submit" class="btn btn-primary from-control">
            
        </form>
        
    </div>
</body>
</html>