<?php
    $this->render('blocks/header');
   
    $this->render('element/background-header');
   
    $this->render('element/search',$data);
    //$this->render('element/list-hotel-domestic',$this->data);
    echo "<img class='img-asia' src='https://viettourist.com//resources/images/1257-cover-2024/du-lich-dong-nam-a.jpg'>";
    //$this->render('element/list-hotel-asia',$this->data);
    $this->render('element/hotel-partner');
    $this->render('element/pay-partner');
    $this->render('element/why-book');
    //$this->render('element/hot-location');
    $this->render('blocks/footer');
   
    
?>