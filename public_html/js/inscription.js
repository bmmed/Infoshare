


function is_pseudo() {
	a=document.getElementById("pseudo_inscription");
	pattern=/^[a-zA-Z]+[[a-zA-Z0-9]{4,35}]*$/;
	if(pattern.test(a.value)==false){

		a.value="";
		ph_erreur(a,"Le pseudo ne peut pas commencer qu'avec une lettre et doit avoir au moins 4 caractère ");
		return false;

	}
	else ph_correct(a);
}

function is_name(){
	pattern=/^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü\-\ ]*$/;
	name=document.getElementById("nom").value;
	e=document.getElementById("nom");
	if(pattern.test(name)==false){
		e.value="";
		ph_erreur(e,"Le nom est non valide");
		return false;


	}
	else ph_correct(e);

}

function is_surname(){
	pattern=/^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü\-\ ]*$/;
	surname=document.getElementById("preN").value;
	e=document.getElementById("preN");
	if(pattern.test(surname)==false)
	{
		surmane="";
		ph_erreur(e,"LE prenom est non valide");
		return false;
	}
	else ph_correct(e);

}

function date(){
	jour=document.getElementById("d_j").value;
	mois=document.getElementById("d_m").value;
	annee=document.getElementById("d_a").value;
	e=document.getElementById("d_j");

	if(jour<1||jour>31){j=true;}else{j=false;}

	if(mois<1 || mois>12){m=true;}else{m=false;}

	if(annee<1900||annee>2016){a=true;}else{a=false;}

	if(a==true ||m==true ||j==true){

		e.value="";
		document.getElementById("d_m").value="00";
		document.getElementById("d_a").value="0000";
		ph_erreur(e,"La date de naissance est non valide");
		return false;

	} 
	else ph_correct(e);


}




function is_mail(){
	mail=document.getElementById("Email");
	pattern=/^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
	if(pattern.test(mail.value)==false)
	{
		mail.value="";
		ph_erreur(mail,"mail non valide EX : boite@sever.com");
		return false;
	}
	else ph_correct(mail);
}


function valid_mdpass(){
	mdp1=document.getElementById('pass');
	mdp2=document.getElementById('Cpass');

	if(mdp1.value.length<6)
	{ 
		ph_erreur(mdp1,"mot de passe inferieur à 6 carectere");
		return false;
	}


	else
	{
		ph_correct(mdp1);
		if(mdp1.value != mdp2.value)
		{
			mdp2.value="";
			ph_erreur(mdp2,"Les mots de passe son pas identique");
			return false;
		}
		else {ph_correct(mdp2);
			  document.getElementById("termine").setAttribute("style","display: inherit;");
			 }
	}
}

function ph_correct(e)
{
	a=e.parentNode;
	b=a.lastElementChild;
	if(b.nodeName=="H3")
	{
		a.removeChild(b);
	}
}

function ph_erreur(e,txt)
{
	a=e.parentNode;
	b=a.lastElementChild;
	if(b.nodeName=="H3"){}
	else
		a.innerHTML+=("<h3 class='ph_erreur'>"+txt+"</h3>");
}


function form_valid(){
	alert('hello');
	if(!is_pseudo() ||
	   !is_name()||
	   !is_surname()||
	   !date()||
	   !is_mail()||
	   !valid_mdpass())	alert('faux');

		}



