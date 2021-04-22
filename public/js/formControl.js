import ManagerMyAccount from './classes/account/ManagerMyAccount.js';

// soumission du formulaire 
if(document.forms["formUpInfo"]){

    document.forms["formUpInfo"].addEventListener('submit',(event)=>{

        event.preventDefault();

        const manager = new ManagerMyAccount();
        manager.formUpInfo();

        
        // Voir dans managerMyAccount se qui se passe 
 
    
    });
    
}

if(document.forms["formUpPass"]){

    document.forms["formUpPass"].addEventListener('submit',(event)=>{

        event.preventDefault();

        const manager = new ManagerMyAccount();
        manager.formUpPass();
        
    });
    
}
