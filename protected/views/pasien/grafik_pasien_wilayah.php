<?php
/* @var $this PasienController */
/* @var $data array */

$this->breadcrumbs = array(
    'Pasiens' => array('index'),
    'Grafik Pasien Wilayah',
);

$this->menu = array(
    array('label' => 'List Pasien', 'url' => array('index')),
    array('label' => 'Manage Pasien', 'url' => array('admin')),
);

$labels = array();
$dataSet = array();

foreach ($data as $row) {
    $labels[] = $row['wilayah']->nama;
    $dataSet[] = $row['jumlah_pasien'];
}
?>

<h1>Grafik Jumlah Pasien per Wilayah</h1>

<canvas id="pasienWilayahChart" width="400" height="200"></canvas>

<script>
    var ctx = document.getElementById('pasienWilayahChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Jumlah Pasien',
                data: <?php echo json_encode($dataSet); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>