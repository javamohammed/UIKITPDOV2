<form method="POST" action="">
                <fieldset class="uk-fieldset">

                   <input    type='hidden' name="id_modal" id="id_modal" value="">
                   <input    type='hidden' name="id_to_delete" id="id_to_delete" value="">
                    <div class="uk-margin">
                        <input class="uk-input" type="text" placeholder="First name"  name="firstname" id="firstname_modal" >
                    </div>

                    <div class="uk-margin">
                      <input class="uk-input" type="text" placeholder="Last name" name="lastname" id="lastname_modal">
                    </div>

                    <div class="uk-margin">
                      <input class="uk-input" type="text" placeholder="Email" name="email" id="email_modal">
                    </div>

                    <div class="uk-margin">
                      <input class="uk-input" type="text" placeholder="Address" name="address" id="address_modal">
                    </div>
                  
                </fieldset>

        </p>
        <p class="uk-text-right">
            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
            <button class="uk-button uk-button-primary" type="submit" name="btn-save" id="btn-action">Save</button>
        </p>
         </form>