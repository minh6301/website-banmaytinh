var money = document.querySelector('#money');
var vnpay = document.querySelector('#vnpay');
const btnMoney = document.querySelector('.btn-money');
const btnVnpay = document.querySelector('.btn-vnpay');


$( "input" ).on( "click", function() {
  var price = $( "input:checked" ).val();
  if(price == 'money')
  {
    btnMoney.style = 'display: block';
    btnVnpay.style = 'display: none';
  }
  else
  {
    btnVnpay.style = 'display: block';
    btnMoney.style = 'display: none';
  }
});

// sessionstorage total price
  function setData(){
    let total = document.getElementById('total').innerHTML;  
    sessionStorage.setItem('total', total);
    let product = document.getElementById('product').innerHTML;
    sessionStorage.setItem('product', product);
  }

  const close = document.querySelector('#close');
  const showProduct = document.querySelector('.hide');
  const fullscreen = document.querySelector('.full__screen');
  const product = document.querySelector('.product__list');

  showProduct.addEventListener('click', function(){
    close.classList.add("active");
    product.classList.add("active");
    fullscreen.classList.add("active");
  });
  close.addEventListener('click', function(){
    close.classList.remove("active");
    product.classList.remove("active");
    fullscreen.classList.remove("active");
  });


  // const getTotal = sessionStorage.getItem('total');
  // document.getElementById('getTotal').innerHTML = getTotal;
  // console.log(getTotal);


    // var countChecked = function() {
    //   var n = $( "input:checked" ).val();
    //   $( ".result" ).text(n);
      
    // };
    // countChecked();
     
    // $( "input[type=checkbox]" ).on( "click", countChecked );

    


    // selectAll
    // $("#selectAll").click(function() {
    //   $("input[type=checkbox]").prop("checked", $(this).prop("checked"));
    // });
    
    // $("input[type=checkbox]").click(function() {
    //   if (!$(this).prop("checked")) {
    //     $("#selectAll").prop("checked", false);
    //   }
    // });
    
    // jackHarnerSig();

  


// // Lưu data vào mảng
//   var itemForm = document.getElementById('itemForm'); // getting the parent container of all the checkbox inputs
//   var checkBoxes = itemForm.querySelectorAll('input[type="checkbox"]'); // get all the check box
//   document.getElementById('submit').addEventListener('click', getData); //add a click event to the save button

//   let result = [];

//   function getData() { // this function will get called when the save button is clicked
//       let result = [];
//       checkBoxes.forEach(item => { // loop all the checkbox item
//           if (item.checked) {  //if the check box is checked
//               let data = {    // create an object
//                   item: item.value,
//                   selected: item.checked
//               }
//               result.push(data.item); 
//             }
//           })
          
//           document.querySelector('.result').innerHTML = result; // display result
//         }


  // Tăng số lượng
    // var plus = document.querySelector('.btn-add');
  // var minus = document.querySelector('.btn-subtract');
  // var quantity = document.querySelector('#quantity');
  // var itemForm = document.getElementById('itemForm'); // getting the parent container of all the checkbox inputs

  
  // const minimum = 0;
  
  //   minus.addEventListener("click", function(){
  //       if (quantity.value <= minimum) {
  //         minus.disabled = true;
  //         return; 
  //       } else {
  //         minus.disabled = false;
  //       }
  //       quantity.value--;
  //   });
    
  //   plus.addEventListener("click", function() {
  //       if (quantity.value > minimum) {
  //         minus.disabled = false;
  //       }
  //       quantity.value++;
  //   });

