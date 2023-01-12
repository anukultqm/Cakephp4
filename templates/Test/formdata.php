<div class="container">
    <div class="row">
    <h2>User Details</h2>
    </div>

    <?php echo $this->Form->create() ?>
    <?php echo $this->Form->control('First_Name',['required'=>false]) ?>
    <?php echo $this->Form->control('Last_Name',['required'=>false]) ?>
    <?php echo $this->Form->control('Phone_Number',['required'=>false]) ?>
    <?php echo $this->Form->control('Gender', ['options' => ['Male', 'FemaLe'],'type' => 'radio'],['required'=>false]);?>  
    <?php echo $this->Form->button('Submit Form', ['type' => 'submit']); ?>
    <?php  echo $this->Form->end();?>

</div>

<table class="table">
  <thead class="thead-dark">
    <tr>
      
      <th scope="col">Sr.no</th>
      <th scope="col">First_Name</th>
      <th scope="col">Last_Name</th>
      <th scope="col">Phone_Number</th>
    </tr>
  </thead>
  <tbody>    
    <tr>
   
      <td></td>
      
    </tr>
  </tbody>
</table>

