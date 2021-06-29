<?php
    setlocale(LC_ALL, 'hun.UTF-8');
    if (isset($_POST['startDate'])) {
        $date = $_POST['startDate'];
        $year = explode('-', $date)[0];
        $month = explode('-', $date)[1];
        $day = explode('-', $date)[2];
        $sundays = [];
        for ($i = $year; $i <= date('Y'); $i++) {
            for ($j = 1; $j <= 12; $j++) {
                
                if (date('w', strtotime($i . '-' . $j . '-1')) == 0) {
                    $sundays[] = strftime('%Y %B %d', strtotime($i.'-'.$j.'-1'));
                }

                if ($i == date('Y') && $j == date('m')) {
                    break;
                }
            }
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Vasárnapok száma</title>
  </head>
  <body>
  <div class="container">
      <div class="row">
          <div class="col-12 col-lg-6 offset-lg-3 mb-5">
              <form method="post">
              <div class="mb-3">
                <label for="startDate" class="form-label">Kezdő dátum</label>
                <input type="date" class="form-control" id="startDate" name="startDate" required>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <?php
            if (isset($_POST['startDate'])):
        ?>
        <div class="col-12 col-lg-6 offset-lg-3">
            <div class="card">
                <div class="card-header text-center">
                    Vasárnapok, melyek az adott hónap első napjára esnek <b><?php echo strftime('%Y %B %d', strtotime($date)) ?></b> óta
                </div>
                <div class="card-body">
                    <div class="row row-cols-1 row-cols-lg-3">
                    <?php 
                        foreach ($sundays as $sunday):
                    ?>
                    <div class="col">
                            <?php echo $sunday; ?>
                    </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <div class="card-footer text-center">
                            Összesen: <b><?php echo count($sundays); ?> db.</b>
                </div>
            </div>
        </div>
        <?php endif; ?>
      </div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>