<div class="book-container">
  <img src="images/<?php echo $filename; ?>" alt="Cover of <?php echo $title; ?>" class="book-image">

  <div class="book-info">
    <h2><?php echo $title; ?></h2>

    <h3><?php echo $author; ?></h3>

    <p class="book-price">£<?php echo $price; ?></p>

    <form
      method="POST"
      action="<?php echo $_SERVER["PHP_SELF"]; ?>?id=<?php echo $bookId; ?>&action=add"
      class="button-form"
    >
      <input class="button" type="submit" name ="addToBasketButton" value="Add to Basket">
    </form>

    <?php if (isset($_SESSION["user_role"]) && $_SESSION["user_role"] === "Admin"): ?>

    <div class="button-group">
      <a 
        href="update-book.php?id=<?php echo $bookId; ?>"
        class="button"
      >
        Edit
      </a>

      <a 
        href="delete-book.php?id=<?php echo $bookId; ?>&title=<?php echo $title; ?>"
        class="button danger"
      >
        Delete
      </a>
    </div>

    <?php endif; ?>
    
    <p class="description">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
      Vero illo et sit aliquam quae dolore tempore debitis alias
      explicabo. Nostrum, eum amet sed necessitatibus harum quae
      reprehenderit, tempora minima voluptatem aliquam ducimus!
      Perspiciatis repudiandae aliquid fuga voluptates ipsum aliquam
      nulla.
    </p>
  </div>
</div>