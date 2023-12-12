function animateDiaporama()
{
    document.addEventListener("DOMContentLoaded", function () {
        var images = document.querySelectorAll('.diaporama img');
        var types = document.querySelectorAll('.diaporama h3');
        var urls = document.querySelectorAll('.diaporama a');
        var index = 0;

        function showImage() {
            images[index].classList.remove('active');
            types[index].classList.remove('active');
            urls[index].classList.remove('active');

            index = (index + 1) % images.length;
            images[index].classList.add('active');
            types[index].classList.add('active');
            urls[index].classList.add('active');


        }
        setInterval(showImage, 5000);
    });
}




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
    console.log(dropdown.classList);

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
    console.log(index);
    document.getElementById('searchInput'+index).value = nom;
    document.getElementById('hidesearchInput'+index).value = value;
    const dropdowns = document.getElementsByClassName('dropdown');
    const dropdown =dropdowns[index-1];
    dropdown.classList.remove('active');
    if(index==1 || index==5 || index==9)
    { 
        getModeleOptions(value,index+1)
        Marque(index)
    }
    else if(index==2 || index==6 || index==10)
    {
        Marque(index)

    }
    else if(index==3 || index==7 || index==11)
    {

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

document.getElementById('NombreVehicule').addEventListener('change' , (e)=>{
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
    let index = id 
    const btn1 = document.getElementById('searchInput'+index) ;
    index= index +1 
    const btn2 = document.getElementById('searchInput'+index) ;
    btn2.value=''
    btn2.disabled = false;
}





function getModeleOptions(id,inex) {

    $.ajax({

        url: '/ComparateurVehicules/api/apiRoutes.php',
        type: 'POST',
        data: {marqueId: id , index :inex},
        success: function(response) {
            $('.drop-div2').empty()

            $('.drop-div2').append(response);
        },
        error: function() {
            console.error('Failed to reload content.');
        }
    });
}





animateDiaporama()
typewriter()
