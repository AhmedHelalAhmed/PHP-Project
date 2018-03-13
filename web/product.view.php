<div class="product">
 <div class="tablerow">
  <div class="tablecell">
   <span class="imag">
    <img src="<?= $product->getPhoto(); ?>" />

   </span>
  </div>
 </div>
 <div class="tablerow">
  <div class="tablecell">
   <span class="element"><?= "<a href=/reviewproduct.php?id={$product->getId()}>{$product->getName()} </a>"; ?></span>
  </div>
 </div>
 <div class="tablerow">
  <div class="tablecell">
   <!--we want just the 100 character-->
   <?php if ($_SERVER['PHP_SELF'] != "/index.php" && $_SERVER['PHP_SELF'] != "/" && $_SERVER['PHP_SELF'] == "checkout.php"): ?>
    <span class="element"> <?= $product->getDescription(); ?></span>
   <?php else: ?>
    <?php if (strpos($_SERVER['PHP_SELF'], 'reviewproduct.php')): ?>
     <span class="element"> <?= $product->getDescription(); ?></span>

    <?php else: ?>
     <span class="element"><?= substr($product->getDescription(), 0, 100); ?></span> 
    <?php endif; ?>
   <?php endif; ?>
  </div>
 </div>
 <div class="tablerow">
  <div class="tablecell">
   <span class="element"><?= $product->getPrice() . " $"; ?></span>  
  </div>
 </div>
 <div class="tablerow">
  <div class="tablecell">
   <span class="element">
    <?php $idd = $product->getId(); ?>
    <?php if ($_SERVER['PHP_SELF'] != "/checkout.php"): ?>
     <?php if (!isset($_SESSION['userId']) || !$_SESSION['userId']): ?>
                                 <!--                    <button id=<?php // $product->getId();        ?> >ADD TO CART</button>-->

     <?php else: ?>

      <?= "<button class='addtocart' id={$idd}>ADD TO CART</button>"; ?>
     <?php endif; ?>
    <?php else: ?>
     <?= "<button class='removefromcart' id={$idd}> &#10006;</button>"; ?>

    <?php endif; ?>
   </span>  
  </div>
 </div>
</div>