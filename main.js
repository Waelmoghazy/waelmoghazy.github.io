    function validate_form() {
        alert('Hello');
        var valid = true;
        const form = document.getElementById("add");
        Array.from(form.elements).forEach(element => {
                    if (element.value==''){
                              alert("Please fill in Product " + element.name + " !! ");
                              valid = false;
                              }
                    });   
                    return valid;       
    }
    function cancelproduct() {
        if(document.getElementById("SKU").value!=""){
                    if(confirm('Are you sure delete this Product?')){
                             document.getElementById("add").submit();
                     }else{}
            }else{
                alert("Please provide the product SKU code?");
            }
    }
    function showDisc() {
    document.getElementById("imp").innerHTML = "<label for='size'><h4>Size (in MB)</h4><input type='number' id='size' name='size' placeholder='Please, provide DVD-Disc Size' required oninvalid='this.setCustomValidity('Please, submit required data')'></label>";
    }
    function showBook() {
    document.getElementById("imp").innerHTML = "<label for='weight'><h4>Weight (in Kg)</h4><input type='number' id='weight' name='weight' placeholder='Please, provide Book Weight' required oninvalid='this.setCustomValidity('Please, submit required data')'></label>";
    }
    function showFurniture() {
    document.getElementById("imp").innerHTML = "<label for='height'><h4>Height</h4><input type='number' name='height' placeholder='Please, provide Furniture Height' required oninvalid='this.setCustomValidity('Please, submit required data')'></label><label for='width'><h4>Width</h4><input type='number' name='width' placeholder='Please, provide Furniture Width' required oninvalid='this.setCustomValidity('Please, submit required data')'></label><label for='length'><h4>Length</h4><input type='number' name='length' placeholder='Please, provide Furniture Length' required oninvalid='this.setCustomValidity('Please, submit required data')'></label>";
    }
    function validate_form_delete(){
        var valid = true;
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        if(checkboxes.length!=0)
        {
            document.forms['main'].submit();
        }
        else
        {
            valid = false;
        }
        return valid;
    }
    
    