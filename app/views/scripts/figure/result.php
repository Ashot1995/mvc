<?php

$data = json_decode($this->params);
echo "<h2>Треугольник</h2>";
for ($i = 0; $i <= $data->row; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $data->char . "&nbsp";
    }
    echo "<br>";
}
?>
<h2>Квадрат</h2>

<div style="height: <?= $data->height=="" ? '200px' : $data->height ?>;
        width: <?= $data->width=="" ? '200px' : $data->width ?>;
        background-color: <?= $data->color=="" ? 'red' : $data->color ?>;
        border: 1px solid black">
</div>
