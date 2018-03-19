<div class="divider"></div>
		<h1>YOUR FOOTER</h1>
  </body>
</html>


<!-- this is your js file that you included on  index.php -->

<?php foreach($js as $jsFile ){ ?>
   <script type="text/javascript" src="<?php echo $jsFile ?>"></script>
<?php }?>
