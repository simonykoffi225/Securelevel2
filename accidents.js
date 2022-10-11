// function sim(){
//     var nbrevictimes = parseFloat(document.getElementById('nbrevictimes').value);
//     var nbrenfants = parseFloat(document.getElementById('nbrenfants').value);
//     var nbrfemmes = parseFloat(document.getElementById('nbrfemmes').value);
//     var nbrhommes = parseFloat(document.getElementById('nbrhommes').value);
//     var button = document.getElementById('button');

//         if( nbrevictimes == nbrenfants+nbrfemmes+nbrhommes){
//             alert("success");
//             button.disabled = ""
//         }else if(nbrevictimes != nbrenfants+nbrfemmes+nbrhommes ){
//             alert("information ne corespond pas au nombre total")
//             button.disabled = "disabled"
//         }else if(nbrevictimes==''|| nbrenfants==''|| nbrfemmes==''|| nbrhommes==''){
//                 alert("information ne corespond pas au nombre total")
//                 button.disabled = "disabled"
//         }
// }

// function entre(){
//     if( nbrevictimes === nbrenfants+nbrfemmes+nbrhommes){
//         alert("success");
//         button.disabled = "";
//     }else if(nbrevictimes != nbrenfants+nbrfemmes+nbrhommes ){
//         alert("information ne corespond pas au nombre total");
//         button.disabled = "disabled";
//     }
// }
function handleInput(){
    var nbrevictimes = parseFloat(document.getElementById('nbrevictimes').value);
    var nbrenfants = parseFloat(document.getElementById('nbrenfants').value);
    var nbrfemmes = parseFloat(document.getElementById('nbrfemmes').value);
    var nbrhommes = parseFloat(document.getElementById('nbrhommes').value);
    var bouton = document.getElementById('bouton')
    
    if( nbrevictimes == nbrenfants+nbrfemmes+nbrhommes){
        // alert("success");
    bouton.disabled="";
    }else if(nbrevictimes != nbrenfants+nbrfemmes+nbrhommes ){
        // alert("information ne corespond pas au nombre total");
        bouton.disabled = "disabled";
    }
}