<?php

$directory = $_POST['my_input'] or die("Не введено значение!");

function count_dir_size(string $dirname) {
    if (is_dir($dirname)) {
        $size = 0;
        foreach(scandir($dirname) as $item) {
            if (filetype($item) === 'dir') {
                $size = $size + count_dir_size($dirname . $item);
            } else {
                $size = $size + filesize($item);
            }
        }
        return $size;
    } else if (is_file($dirname)) {
        return filesize($dirname);
    }
    return 0;
}

if (is_dir($directory)) {
    $arr = scandir($directory);
    $arr = array_diff($arr, array(".", ".."));
    if (count($arr) === 0) {
        echo "Ничего нет!";
        die();
    }
    echo '<h1 style="text-align: center; margin-top: 50px;">Содержимое папки ' . $directory . '</h1>';
    echo '<table style="width:100vw;">';
    echo '<thead><tr><td>Файл</td><td>Размер</td><td>Дата и время создания</td><td>Дата и время изменения</td><td>Дата и время доступа</td><td>Текст</td></tr></thead>';
    echo '<tbody>';
    echo '<tr><td> </td><td> </td><td> </td><td> </td><td> </td></tr>';
    foreach ($arr as $item) {
        $size = filesize($directory . $item) or "=(";
        $size_output = count_dir_size($directory . $item);
        $modify_date = date("F d Y H:i:s ", filemtime($directory . $item));
        $create_date = date("F d Y H:i:s ", filectime($directory . $item));
        $access_date = date("F d Y H:i:s ", fileatime($directory . $item));
        
        // Только для файлов
        $text = "--- ЭТО ПАПКА ---";
        if (is_file($directory . $item)) {
            $text = file_get_contents($directory . $item, true, null, 0, 100);
        }

        echo "<tr>";
        echo '<td>' . $item . "</td>"; 
        echo "<td>" . $size_output . '</td>';
        echo '<td>' . $create_date . '</td>';
        echo '<td>' . $modify_date . '</td>';
        echo '<td>' . $access_date . '</td>'; 
        echo '<td>' . $text . '</td>';
        echo"</tr>" ;
    }
    echo '</div>';
} else {
    echo 'Папка не найдена!';
}

