function validate(form)
        {
          fail=valmail(form.emailbox.value);

          if(fail=="")
            return true;
         else
           { alert(fail);
            return false;
           }
        }
        function valmail(field)
        {
            if (field == "")
               return "No email entered\n"
            else if ( !(((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field) ))
               return "E-mail Address INVALID\n"
    
               return ""
        }