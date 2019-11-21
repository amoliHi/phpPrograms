<?php

function orderedlist()
{
    $firstopen = fopen("myfilenumber.txt", "r");
    $filecontent = file_get_contents("myfilenumber.txt");
    $arr = explode(" ", $filecontent);
    fclose($firstopen);
    $size = count($arr);
    $obj = new Orderedlist();
    for ($i = 0; $i < $size; $i++) {
        $obj->insertLast($arr[$i]);
    }
    echo "Original list.\n";
    $array = $obj->readList();
    print_r($array);
    echo "Sorted list.\n";
    $arr = $obj->readList();
    print_r($arr);
    $key = readline("Enter the number you want to search: \n");
    $obj->find($key);

    $found = $obj->find($key);
    if ($found == $key) {
        echo "Element found and now deleting it.\n";
        echo '".txt" file updated.' . "\n";
        $obj->deleteNode($key);
        $obj->sortList();
        $array1 = $obj->readList();
        print_r($array1);
        $new1 = implode(" ", $array1);
        $open1 = fopen("myfilenumber.txt", "w");
        fwrite($open1, $new1);
        fclose($open1);
    } else {
        echo "Element not found. Adding element to the list.\n";
        echo '".txt" file updated.' . "\n";
        $obj->insertLast($key);
        $obj->sortList();
        $array2 = $obj->readList();
        print_r($array2);
        $updatedlist = implode(" ", $array2);
        $open2 = fopen("myfilenumber.txt", "w");

        fwrite($open2, $updatedlist);
        fclose($open2);
    }
}
