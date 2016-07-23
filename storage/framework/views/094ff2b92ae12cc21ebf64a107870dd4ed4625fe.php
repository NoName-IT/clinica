<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
  </head>
  <body>
 
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>INVOICE <?php echo e($invoice); ?></h1>
          <div class="date">Date of Invoice: <?php echo e($date); ?></div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">DESCRIPTION</th>
            <th class="unit">UNIT PRICE</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="no"><?php echo e($data['quantity']); ?></td>
            <td class="desc"><?php echo e($data['description']); ?></td>
            <td class="unit"><?php echo e($data['price']); ?></td>
            <td class="total"><?php echo e($data['total']); ?> </td>
          </tr>
 
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td >TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>
      </table>
  </body>
</html>