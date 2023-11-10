function launchModal(id)
{
    const name = $(`#name_${id}`).val();
    const price = $(`#price_${id}`).val();
    const company = $(`#company_${id}`).val();
    var baseRoute = $('#route').attr('content');
    var route = baseRoute + '/' + id;
    $('#update_form').attr('action', route); 
    $('#nameup').val(name); 
    $('#priceup').val(price); 
    $('#companyup').val(company); 
    $('#modalEditar').modal('show');
  
}


/*
function destroy(id){
    var baseRoute = $('#route-delete').attr('content');
    var route = baseRoute + '/' + id;
    $('#delete-form').attr('action', route); 
}
*/

