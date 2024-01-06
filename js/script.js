
    function typewriter()
    {
        var TxtType = function(el, toRotate, period) {
            this.toRotate = toRotate;
            this.el = el;
            this.loopNum = 0;
            this.period = parseInt(period, 10) || 2000;
            this.txt = '';
            this.tick();
            this.isDeleting = false;
        };
        TxtType.prototype.tick = function() {
            var i = this.loopNum % this.toRotate.length;
            var fullTxt = this.toRotate[i];

            if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
            } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
            }

            this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

            var that = this;
            var delta = 200 - Math.random() * 100;

            if (this.isDeleting) { delta /= 2; }

            if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
            } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
            }

            setTimeout(function() {
            that.tick();
            }, delta);
        };

        window.onload = function() {
            var elements = document.getElementsByClassName('typewrite');
            for (var i=0; i<elements.length; i++) {
                var toRotate = elements[i].getAttribute('data-type');
                var period = elements[i].getAttribute('data-period');
                if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
                }
            }
            // INJECT CSS
            var css = document.createElement("style");
            css.type = "text/css";
            css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #068FFF}";
            document.body.appendChild(css);
        };

}

let inputNum = -1;


function showallOptions(index)
{
    inputNum = index;
    const dropdowns = document.getElementsByClassName('dropdown');
    for(drop of dropdowns)
    {
        drop.classList.remove('active');

    }
    const dropdown =dropdowns[index-1];
    const options = dropdown.getElementsByClassName('dropdown-item');
    for (const option of options) {
        option.style.display = 'block';
    }
    dropdown.classList.add('active');

}

function filterOptions(index) {
    const input = document.getElementById('searchInput'+index);
    
    const dropdowns = document.getElementsByClassName('dropdown');
    const dropdown =dropdowns[index-1];
    const options = dropdown.getElementsByClassName('dropdown-item');

    const searchTerm = input.value.toLowerCase();
    if(searchTerm==='')
    {
        dropdown.classList.remove('active');
    
    }else{
        for (const option of options) {
            const optionText = option.textContent.toLowerCase();
            if (optionText.includes(searchTerm)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }
        dropdown.classList.add('active');
    }

}

function selectOption(value,index,nom) {
    index = parseInt(index, 10);
    document.getElementById('searchInput'+index).value = nom;
    document.getElementById('hidesearchInput'+index).value = value;
    const dropdowns = document.getElementsByClassName('dropdown');
    const dropdown =dropdowns[index-1];
    dropdown.classList.remove('active');
    if(index==1 || index==5 || index==9 || index===13)
    { 
        getModeleOptions(value,index+1)
        Marque(index)
    }
    else if(index==2 || index==6 || index==10 || index===14)
    {
        getVersionOptions(value,index+1)
        Modele(index)

    }
    else if(index==3 || index==7 || index==11 || index===15)
    {
        getAnneeOptions(value,index+1)
        Version(index)
    }
    else{

    }

}

document.addEventListener('click', function (e) {
    const customSelects = document.getElementsByClassName('custom-select');
    const customSelect = customSelects[inputNum-1];
    if(customSelect)
    {
        if (!customSelect.contains(e.target)  ) {
            const dropdowns = document.getElementsByClassName('dropdown');
            for(const dropdown of dropdowns)
            {
                dropdown.classList.remove('active');
    
            }
        }
    }
    
});

document.getElementById('NombreVehicule')?.addEventListener('change' , (e)=>{
    const value = e.target.value
    console.log(value);

    if(value==2)
    {
        document.getElementById("form3").style.display = 'none' ;
        document.getElementById("form4").style.display = 'none' ;
    }
    else if(value==3)
    {        

        document.getElementById("form3").style.display = 'block' ;

        document.getElementById("form4").style.display = 'none' ;
    }
    else {
        document.getElementById("form3").style.display = 'block' ;
        document.getElementById("form4").style.display = 'block' ;
    }
})

function Marque(id)
{

    let index =0
    console.log(index);
    index = parseInt(id, 10);
    const btn1 = document.getElementById('searchInput'+index) ;
    index= index +1 
    const btn2 = document.getElementById('searchInput'+index) ;
    const btn21 = document.getElementById('hidesearchInput'+index) ;

    if(btn2) {btn2.value=''
    btn2.disabled = false;
    }
    if(btn21) btn21.value=''



    index= index +1 
    const btn3 = document.getElementById('searchInput'+index) ;
    const btn31 = document.getElementById('hidesearchInput'+index) ;
    if(btn31) btn31.value=''
    if(btn3) btn3.value=''

    index= index +1 
    const btn4 = document.getElementById('searchInput'+index) ;
    const btn41 = document.getElementById('hidesearchInput'+index) ;
    if(btn41) btn41.value=''
    if(btn4) btn4.value=''
}

function Modele(id){
    let index =0
    index = parseInt(id, 10);
    const btn1 = document.getElementById('searchInput'+index) ;
    index= index +1 
    const btn2 = document.getElementById('searchInput'+index) ;
    const btn21 = document.getElementById('hidesearchInput'+index) ;

    if(btn2) {btn2.value=''
    btn2.disabled = false;
    }
    if(btn21) btn21.value=''

    index= index +1 
    const btn3 = document.getElementById('searchInput'+index) ;
    const btn31 = document.getElementById('hidesearchInput'+index) ;
    if(btn31) btn31.value=''

    if(btn3) btn3.value=''
}

function Version(id){
    let index =0
    index = parseInt(id, 10);
    const btn1 = document.getElementById('searchInput'+index) ;
    index= index +1 
    const btn2 = document.getElementById('searchInput'+index) ;
    const btn21 = document.getElementById('hidesearchInput'+index) ;

    if(btn2) {btn2.value=''
    btn2.disabled = false;
    }
    if(btn21) btn21.value=''

  
}





function getModeleOptions(id,inex) {

    $.ajax({

        url: '/ComparateurVehicules/api/apiRoutes.php',
        type: 'POST',
        data: {marqueId: id , index :inex},
        success: function(response) {
            
            if(inex>=1 && inex<= 4)
            {
                $('#form1 .drop-div2').empty()
                $('#form1 .drop-div2').append(response);
            }
            else if(inex>=5 && inex<= 8)
            {
                $('#form2 .drop-div2').empty()
                $('#form2 .drop-div2').append(response);
            }
            else if(inex>=9 && inex<=13)
            {
                $('#form3 .drop-div2').empty()
                $('#form3 .drop-div2').append(response);
            }
            else {
                $('#form4 .drop-div2').empty()
                $('#form4 .drop-div2').append(response);
            }
        },
        error: function() {
            console.error('Failed to reload content.');
        }
    });
}

function getVersionOptions(id,inex)
{
    $.ajax({

        url: '/ComparateurVehicules/api/apiRoutes.php',
        type: 'POST',
        data: {modeleId: id , index :inex},
        success: function(response) {
            console.log(response);
            if(inex>=1 && inex<= 4)
            {
                $('#form1 .drop-div3').empty()
                $('#form1 .drop-div3').append(response);
            }
            else if(inex>=5 && inex<= 8)
            {
                $('#form2 .drop-div3').empty()
                $('#form2 .drop-div3').append(response);
            }
            else if(inex>=9 && inex<=13)
            {
                $('#form3 .drop-div3').empty()
                $('#form3 .drop-div3').append(response);
            }
            else {
                $('#form4 .drop-div3').empty()
                $('#form4 .drop-div3').append(response);
            }
        },
        error: function() {
            console.error('Failed to reload content.');
        }
    });
}

function getAnneeOptions(id,inex)
{
    $.ajax({
        url: '/ComparateurVehicules/api/apiRoutes.php',
        type: 'POST',
        data: {version: id , index :inex},
        success: function(response) {
            if(inex>=1 && inex<= 4)
            {
                $('#form1 .drop-div4').empty()
                $('#form1 .drop-div4').append(response);
            }
            else if(inex>=5 && inex<= 8)
            {
                $('#form2 .drop-div4').empty()
                $('#form2 .drop-div4').append(response);
            }
            else if(inex>=9 && inex<=13)
            {
                $('#form3 .drop-div4').empty()
                $('#form3 .drop-div4').append(response);
            }
            else {
                $('#form4 .drop-div4').empty()
                $('#form4 .drop-div4').append(response);
            }
        },
        error: function() {
            console.error('Failed to reload content.');
        }
    });
}






const CompareSubmit = document.getElementById("CompareBtn")
CompareSubmit?.addEventListener('click' , ()=>{
    const marque1 = document.getElementById("hidesearchInput1")?.value
    const modele1= document.getElementById("hidesearchInput2")?.value
    const version1= document.getElementById("hidesearchInput3")?.value
    const annee1 = document.getElementById("hidesearchInput4")?.value

    const marque2 = document.getElementById("hidesearchInput5")?.value
    const modele2= document.getElementById("hidesearchInput6")?.value
    const version2= document.getElementById("hidesearchInput7")?.value
    const annee2 = document.getElementById("hidesearchInput8")?.value

    const marque3 = document.getElementById("hidesearchInput9")?.value
    const modele3= document.getElementById("hidesearchInput10")?.value
    const version3= document.getElementById("hidesearchInput11")?.value
    const annee3 = document.getElementById("hidesearchInput12")?.value

    const marque4 = document.getElementById("hidesearchInput13")?.value
    const modele4= document.getElementById("hidesearchInput14")?.value
    const version4= document.getElementById("hidesearchInput15")?.value
    const annee4 = document.getElementById("hidesearchInput16")?.value

    const nbrForms = document.getElementById('NombreVehicule')?.value

    const span = document.getElementById("error-from")

    span.style.display="none"
    if(marque1=='' || marque2=='' || modele1=='' || modele2 =='' || version1=='' || version2=='' || annee1=='' || annee2=='')
    {
        span.style.display="block"
    }
    else{
        if(nbrForms == 3)
        {
            if(marque3=='' ||modele3=='' || version3=='' || annee3=='')
            {
                span.style.display="block"
            }
            else{
                location.href="/ComparateurVehicules/compare?V1="+annee1+"&V2="+annee2+"$V3="+annee3
            }
        }
        else if(nbrForms==4)
        {
            if(marque3=='' ||modele3=='' || version3=='' || annee3==''|| marque4=='' ||modele4=='' || version4=='' || annee4=='')
            {
                span.style.display="block"
            }
            else{
                location.href="/ComparateurVehicules/compare?V1="+annee1+"&V2="+annee2+"$V3="+annee3+"$V4="+annee4

            }
        }
        else{
            location.href="/ComparateurVehicules/compare?V1="+annee1+"&V2="+annee2
        }
    }

})


function sendMsg(nom , email , message)
{
    $.ajax({
        url: '/ComparateurVehicules/api/apiRoutes.php',
        type: 'POST',
        data: {name: nom , email : email , message :message},
        success: function(response) {
            if(response)
            {
                alert('Votre message a été envoyer avec success')
                document.getElementById("MsgName").value='';
                document.getElementById("MsgEmail").value='' ; 
                document.getElementById("MsgMsg").value='' ; 
            }
            
        },
        error: function() {
            console.error('Failed to reload content.');
        }
    });
}

const sendMsgBtn = document.getElementById("EnvoyerMsg") ; 
sendMsgBtn?.addEventListener('click' , ()=>{
    const nom = document.getElementById("MsgName").value ; 
    const email = document.getElementById("MsgEmail").value ; 
    const message = document.getElementById("MsgMsg").value ; 
    if(nom==='' || email==='' || message=== ''){
        alert("S'il vous plait remplissez tous les champs")
    }
    else{
        sendMsg(nom,email,message) ; 
    }
   
})

const SignUpbtn =document.getElementById('InscrptionBtn')
SignUpbtn?.addEventListener('click',()=>{
    const nom = document.getElementById("NomSignup").value ; 
    const prenom = document.getElementById("PrenomSignup").value ; 
    const sexe = document.getElementById("SexeSignup").value ;
    const dateNaissance = document.getElementById("DateSignup").value ;
    const email = document.getElementById("EmailSignup").value ;
    const password = document.getElementById("PwdSignup").value ;
    if(nom==='' || prenom ==='' || sexe==='' || dateNaissance ==='' || email==='' || password==='' )
    {
        alert("S'il vous plait remplissez tous les champs")
    }
    else{
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {nom: nom , prenom : prenom , sexe : sexe , dateNaissance : dateNaissance ,  email : email , password :password},
            success: function(response) {
                console.log(response);
                if(response==1)
                {
                    location.href='/ComparateurVehicules/'
                }
                else if(response==2)
                {
                    alert('Votre adress email est deja enregistrer')
                }
                
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });
    }
    
})



const LoginBtn = document.getElementById('LoginBtn') ; 
LoginBtn?.addEventListener('click',()=>{
    const email = document.getElementById("emailLogin").value ;
    const password = document.getElementById("passwordLogin").value ;
    if(email==='' || password==='' )
    {
        alert("S'il vous plait remplissez tous les champs")
    }
    else{
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {emailLogin : email , passwordLogin :password},
            success: function(response) {
                console.log(response);
                if(response==1)
                {
                    location.href='/ComparateurVehicules/'
                }
                else{
                    alert('Mot de passe ou email incorrect ')
                }
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });
    }
})


const LogoutBtn = document.getElementById('LogoutBtn')
LogoutBtn?.addEventListener('click',()=>{
    var result = confirm("Vous Etes sur que vous voulez déconnecter");
    if(result){
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {Logout : 1 },
            success: function(response) {
                if(response)
                {
                    location.href='/ComparateurVehicules/'
                }
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });
    }
})


const selectVech = document.getElementById('SelectVechMark')
selectVech?.addEventListener('change' ,(e)=>{
    const value= e.target.value
    const div = document.getElementById('vchinfos');
    var match1 = location.href.match(/\/ComparateurVehicules\/marque\?id=(\d+)/);
    var match3 = location.href.match(/\/ComparateurVehicules\/avis\?id=(\d+)/);
    let type ;
    if(match1)
    {
        type = 0 ;
    }
    else if(match3)
    {
        type= 1 ;
    } 

    if(value!=-1)
    {
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {idVech : value ,type :type },
            success: function(response) {
                if(response)
                {
                    div.innerHTML=response
                }
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });
    }
    else{
        div.innerHTML='';
    }

})



const showMoreBtn = document.getElementById('showMoreBtn')
showMoreBtn?.addEventListener('click',()=>{
    const div = document.getElementById('moreInfos')
    
        div.style.display='block' ; 

   showMoreBtn.style.display = 'none'
})

const showLessBtn = document.getElementById('showLessBtn')
showLessBtn?.addEventListener('click',()=>{
    const div = document.getElementById('moreInfos')
   
    div.style.display='none' ; 
    
   showMoreBtn.style.display = 'block'
})

if (location.href.match(/^.*\/ComparateurVehicules\/vehicule\?id=\d+$/)) {
    const marque1 = document.getElementById("searchInput1")
    const modele1= document.getElementById("searchInput2")
    const version1= document.getElementById("searchInput3")
    const annee1 = document.getElementById("searchInput4")
    const Hidemarque1 = document.getElementById("hidesearchInput1")
    const Hidemodele1= document.getElementById("hidesearchInput2")
    const Hideversion1= document.getElementById("hidesearchInput3")

    const Hideannee1 = document.getElementById("hidesearchInput4")
    var match = location.href.match(/\/ComparateurVehicules\/vehicule\?id=(\d+)/);
    const id = match[1];
    Hideannee1.value=id ;
    console.log(id);

    $.ajax({
        url: '/ComparateurVehicules/api/apiRoutes.php',
        type: 'POST',
        data: {IdVehicule : id },
        success: function(response) {
            const res = response[0];
            marque1.value=res.marque ;
            modele1.value=res.modele;
            version1.value = res.Version;
            Hidemarque1.value=res.marque ;
            Hidemodele1.value=res.modele;
            Hideversion1.value = res.Version;
            annee1.value = res.Annees ;
            marque1.disabled =true ;

        },
        error: function() {
            console.error('Failed to reload content.');
        }
    });


}

// Rating Initialization
$(document).ready(function() {
    $('#rateMe1').mdbRate();
  });


const AddAvisBtn =document.getElementById('AddAvisBtn')
AddAvisBtn?.addEventListener('click',()=>{
    const radioButtons=document.getElementsByName('stars');
    const comment = document.getElementById('commentAvis').value ; 
    var match1 = location.href.match(/\/ComparateurVehicules\/vehicule\?id=(\d+)/);
    var match2 = location.href.match(/\/ComparateurVehicules\/marque\?id=(\d+)/);
    var match3 = location.href.match(/\/ComparateurVehicules\/avis\?id=(\d+)/);
    let Vid = -1 ;
    let Mid = -1 ;

    if(match1){
        Vid = match1[1]
    }
    else if(match2)
    {
        Mid = match2[1]
    }
    else if(match3)
    {
        Mid = match3[1]

    }
    let selectdStar =0 ;
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
          selectdStar = radioButtons[i].value
          break; 
        }
    }
    if(selectdStar ===0 || comment==='')
    {
        alert("S'il vous plait remplissez tous les champs");
    }
    else {
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {NbrStars : selectdStar , comment : comment ,Vid :Vid , Mid:Mid},
            success: function(response) {
                console.log(response);
                if(response==1)
                {
                    alert('Votre Commentaire a été ajouter avec success')
                    for (var i = 0; i < radioButtons.length; i++) {
                        if (radioButtons[i].checked) {
                          radioButtons[i].checked = false
                          break; 
                        }
                    }
                    document.getElementById('commentAvis').value='';
                }
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });
    }
})



const FavBtn = document.getElementById('Fav');
FavBtn?.addEventListener('click', () => {
    const image = document.getElementById('FavImage');
    var match1 = location.href.match(/\/ComparateurVehicules\/vehicule\?id=(\d+)/);
    if (image.src.match(/^.*\/ComparateurVehicules\/assets\/Cstar$/)) {
        image.src = '/ComparateurVehicules/assets/Ostar';
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {NewFav : match1[1] },
            success: function(response) {
                if(response==1)
                {
                    alert('La Voiture a été ajouter a votre favorite ')
                }
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });

    } else {
        image.src = '/ComparateurVehicules/assets/Cstar';
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {DelFav : match1[1] },
            success: function(response) {
                if(response==1)
                {
                    alert('La Voiture a été supprimer de votre favorite ')
                }
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });
    }
});

const delFavBtns = document.getElementsByClassName('delImg');

Array.from(delFavBtns).forEach(btn => {
    btn.addEventListener('click', () => {
        const DelFav =btn.value 
        var result = window.confirm("Etes vous sure que vous voulez supprimer cette voiture ?");
        if(result)
        {
            $.ajax({
                url: '/ComparateurVehicules/api/apiRoutes.php',
                type: 'POST',
                data: {DelFav :DelFav },
                success: function(response) {
                    if(response==1)
                    {
                        location.reload()
                    }
                },
                error: function() {
                    console.error('Failed to reload content.');
                }
            });
        }
        
    });
});


const SelectVechGuide = document.getElementById('SelectVechGuide')

SelectVechGuide?.addEventListener('change',(e)=>{
    location.href='/ComparateurVehicules/vehicule?id='+e.target.value
})





const LoginBtnAdmin = document.getElementById('LoginBtnAdmin') ; 
LoginBtnAdmin?.addEventListener('click',()=>{
    const email = document.getElementById("emailLogin").value ;
    const password = document.getElementById("passwordLogin").value ;
    if(email==='' || password==='' )
    {
        alert("S'il vous plait remplissez tous les champs")
    }
    else{
        $.ajax({
            url: '/ComparateurVehicules/api/apiRoutes.php',
            type: 'POST',
            data: {AdminEmailLogin : email , passwordLogin :password},
            success: function(response) {
                console.log(response);
                if(response==1)
                {
                    location.href='/ComparateurVehicules/admin'
                }
                else{
                    alert('Mot de passe ou email incorrect ')
                }
            },
            error: function() {
                console.error('Failed to reload content.');
            }
        });
    }
})


$(document).ready(function() {
    var table = $('#example').DataTable({
        searchPanes: true
    });
    table.searchPanes.container().prependTo(table.table().container());
    table.searchPanes.resizePanes();
});

$(document).ready(function () {
    // Create your new element (replace this with your actual content)
    var newElement = $('<a href="/ComparateurVehicules/admin/AddMarque"></a>').css({
        'background-color': '#068FFF',
        'color': 'white',
        'marging-left':'10px',
        'padding': '8px',
        'border-radius': '5px',
        'font-weight' : 'bold'
    }).hover(
        function () {
            // Mouse enter - change background color to blue
            $(this).css('background-color', 'blue');
        },
        function () {
            // Mouse leave - revert background color to the original
            $(this).css('background-color', '#068FFF');
        }
    ).text('Ajouter une Marque');
    
    
    // Insert the new element in front of the element with class 'dataTables_length'
    $('div.dataTables_filter label').after(newElement);

    // Initialize DataTable
        // Your DataTable initialization options go here
    });
typewriter()



