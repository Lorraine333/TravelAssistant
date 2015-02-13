create or replace package traveler_admin_package is

type dependent_objects is RECORD
     {
        dependent_name ALL_DEPENDENCIES.name%TYPE,
        dependent_type ALL_DEPENDENCIES.type%TYPE,
        refer_name ALL_DEPENDENCIES.referenced_name%TYPE,
        refer_type ALL_DEPENDENCIES.referenced_type%TYPE
     };
     
type typeCursor is REF CURSOR;

procedure get_disabled_triggers ();

function all_dependent_objects 
(
     OBJECT_NAME in varchar(50),
     c_cursor in typeCursor
) return dependent_objects;

end traveler_admin_package;
/
create or replace package body traveler_admin_package is

procedure get_disabled_triggers ()
is 
begin     
   select trigger_name, trigger_type from ALL_TRIGGERS where STATUS='DISABLED';
   EXCEPTION
   WHEN NO_DATA_FOUND THEN
     DEMS_OUTPUT.PUT_LINE('There is no disabled trigger!!^_^');
end get_disabled_triggers;

function all_dependent_objects (OBJECT_NAME in varchar(50), c_cursor in typeCursor) return dependent_objects is
result_dependence dependent_objects;
begin
   open c_cursor for 
   select NAME,TYPE,REFERENCED_NAME,REFERENCED_TYPE into result_dependence where NAME=OBJECT_NAME;
   return result_dependence;
   EXCEPTION
   WHEN NO_DATA_FOUND THEN
     DEMS_OUTPUT.PUT_LINE('This is a independent object.');
   close c_cursor;
end;

end traveler_admin_package;
/
