Show Completed Local Zakat Committee by District

select lzc_list.district_id, district_users.district_name, district_users.number_of_lzc as 'Number of LZCs', count(*) as 'Total Registered' , count(*)/ district_users.number_of_lzc*100 as Percent from 
lzc_list right JOIN district_users on district_users.id = lzc_list.district_id where length(lzc_list.gs_name)>0 group by lzc_list.district_id, district_users.district_name order by Percent desc

****************************  SHOW PROGRESS by Mustahqeen *********************************
select guzara_allowance_mustahiqeen.district_id, district_users.district_name, district_users.number_of_lzc as 'Number of LZCs', district_users.NOB*5 as 'Total Target', count(guzara_allowance_mustahiqeen.district_id) as 'Total Registered' , (count(guzara_allowance_mustahiqeen.district_id)/ (district_users.nob*5))*100 as Percent from guzara_allowance_mustahiqeen right JOIN district_users on district_users.id = guzara_allowance_mustahiqeen.district_id group by guzara_allowance_mustahiqeen.district_id, district_users.district_name order by Percent desc

SELECT `district_id`,`district_name`,`Number of LZCs`,`Total Target`,`Total Registered`,`Total Target`-`Total Registered`as 'Remaining Registrations', `Total Registered`/`Total Target`*100 as Percent FROM `showprogress`;
select count(*) from guzara_allowance_mustahiqeen;

SELECT showprogress.`district_id`,showprogress.`Province`,`district_name`,showprogress.`Number of LZCs`, `Total Target`,`Total Registered`,`Total Target`-`Total Registered`as 'Remaining Registrations', `Total Registered`/`Total Target`*100 as Percent, count(dist_head_wise_fund.cheque_no) as 'Cheque Issued', count(dist_head_wise_fund.cheque_no)-showprogress.`Number of LZCs` as 'Remaining Cheques' FROM `showprogress` left JOIN dist_head_wise_fund on dist_head_wise_fund.district_id = showprogress.district_id where dist_head_wise_fund.account_head='Guzara Allowance' group by dist_head_wise_fund.district_id order by Percent desc

select Province, district_users.District_Name, district_users.NOB, district_users.NOB*5 as 'Required Registrations', count(*) as 'Total Registered', (district_users.NOB*5-count(*)) as 'Remaining' from guzara_allowance_mustahiqeen right JOIN district_users on district_users.id = guzara_allowance_mustahiqeen.district_id where Province='Ex-Fata' group by Province, district_users.District_Name

****************************  SHOW PROGRESS by CHEQUES ISSUED TO LZCs *********************************
SELECT showprogress.`district_id`,`district_name`,`Number of LZCs`,`Total Target`,`Total Registered`,`Total Target`-`Total Registered`as 'Remaining Registrations', `Total Registered`/`Total Target`*100 as Percent, count(dist_head_wise_fund.cheque_no) as 'Cheque Issued' FROM `showprogress` left JOIN dist_head_wise_fund on dist_head_wise_fund.district_id = showprogress.district_id group by dist_head_wise_fund.district_id order by Percent desc


select `LZCActualName`, count(*) from guzara_allowance_mustahiqeen where `LZC_name` in (select id from lzc_list where gs_username='1410137182383') group by `LZCActualName`

update `guzara_allowance_mustahiqeen` set `total_marks`= `total_marks_new` where LZC_name not in (select `lzc_institution_madrasa` from dist_head_wise_fund
http://zmis.swkpk.gov.pk/zmis/Dist_GA_mustahiq_reg/manage_mustahiq_marks

****************************  SHOW PROGRESS *********************************
UPDATE users SET users.zakat_paid_staff_id = (SELECT distinct zakat_paid_staff_list.id FROM zakat_paid_staff_list WHERE zakat_paid_staff_list.cnic=users.user_name)

************** SHOW PROGRESS BY GROUP SEC BY DATE ON ALL LZC *****************************
SELECT `LZCActualName`,`add_date`, count(*) FROM `guzara_allowance_mustahiqeen` where `LZCActualName` in (select LZC_name from lzc_list where gs_username='1610188106521') group by `LZCActualName`,`add_date`
******************************************************************************************
SELECT * FROM zakat_paid_staff_list where `cnic` in (select user_name from (select user_name, count(*) from users group by user_name having count(*)>1) aa) order by `name`

Data Entered by web & Mobile
SELECT district_users.district_name, guzara_allowance_mustahiqeen.device, count(*) as 'Total Mustehqeen Entered' FROM guzara_allowance_mustahiqeen right JOIN district_users on district_users.id = guzara_allowance_mustahiqeen.district_id group by guzara_allowance_mustahiqeen.device, district_users.district_name order by count(*) desc

*********************************  Show Entry by DEO / GS ***************************
select `District_Name`,`EntryUserName`,`Device`, count(*) from guzara_allowance_mustahiqeen where District_Name='Abbottabad' and `add_date`='2020-10-04' group by `District_Name`,`EntryUserName`,`Device`


*********************************  SEARCH FOR DUPLICATION *****************************
select * from guzara_allowance_mustahiqeen where id>350000 and `mustahiq_cnic` in (SELECT `mustahiq_cnic` FROM `guzara_allowance_mustahiqeen` group by `mustahiq_cnic` having count(`mustahiq_cnic`)>=2 ) order by `mustahiq_cnic` DESC

****************************************************************************************


************************************* NEW QUERY FOR SIX INDICATORS ******************************

select gam.District_Name, du.NOB as 'Total Beneficaries',
  count(case when gam.gender = 'Male' THEN 1 END) Male,
  count(case when gam.gender = 'Female' THEN 1 END) Female,
  count(gam.gender) as 'Total Gender',
  count(case when gam.category = 'Disable' THEN 1 END) Disable,
  count(case when gam.category = 'Orphan' THEN 1 END) Orphan,
  count(case when gam.category = 'Widow' THEN 1 END) Widow,
  count(case when gam.category = 'Poor' THEN 1 END) Poor,
  count(Category) as TotalCategory
from guzara_allowance_mustahiqeen gam right JOIN district_users du on du.id = gam.district_id
group by gam.District_Name


***************************** UPDATE QUERIES********************************

 UPDATE guzara_allowance_mustahiqeen t1 
        INNER JOIN district_users t2 ON 
        t1.district_id = t2.id
        SET t1.District_Name = t2.district_name;

UPDATE guzara_allowance_mustahiqeen t1 
        INNER JOIN lzc_list t2 
        ON t1.LZC_name = t2.id
        SET t1.LZCActualName = t2.lzc_name,
             t1.EntryUserName = t2.gs_name;

UPDATE lzc_list t1 
        INNER JOIN dist_head_wise_fund t2 ON 
        t1.id = t2.lzc_institution_madrasa
        SET t1.nob = t2.nob;
update `guzara_allowance_mustahiqeen` set Province='Ex-Fata' where district_id in (2,14,17,22,23,25,28);
update `guzara_allowance_mustahiqeen` set Province='KP' where district_id not in (2,14,17,22,23,25,28);


// Query to Update Number of NOBs for New Year and New Installment (Only RUNS once in a year)
UPDATE lzc_list t1 
        INNER JOIN dist_head_wise_fund t2 ON 
        t1.`lzc_code` = t2.lzc_institution_madrasa
        SET t1.nob = t2.nob
        where (t2.year = '2020-21') and (t2.installment='1&2')



// FOR SWMIS
UPDATE beneficiaries_info t1 INNER JOIN district t2 ON t1.district_id = t2.id SET t1.District_Name = t2.district_name



*******SELECT ALL LZC and total*****
select lzc_list.id,lzc_list.lzc_name, count(guzara_allowance_mustahiqeen.LZC_name) from lzc_list LEFT JOIN guzara_allowance_mustahiqeen ON guzara_allowance_mustahiqeen.LZC_name=lzc_list.id where lzc_list.district_id=26 GROUP by lzc_list.lzc_name,lzc_list.id





ISSUE IN COMMAND
UPDATE users SET users.user_name = (SELECT distinct zakat_paid_staff_list.cnic FROM zakat_paid_staff_list WHERE left(zakat_paid_staff_list.cnic,12) = users.user_name)

DATA CORRECTION
update users set `zakat_paid_staff_id`=`test` where `zakat_paid_staff_id`=0 and `test`<>0

***************** UPDATE DAUGHTERS *******************
update  `guzara_allowance_mustahiqeen_details` set `dependences_daughters`='1 Adult(Un-Married)' where `dependences_daughters`='1 Adult (Un-married)';
update  `guzara_allowance_mustahiqeen_details` set `dependences_daughters`='2 Adult(Un-Married)' where `dependences_daughters`='2 Adult (Un-married)';
update  `guzara_allowance_mustahiqeen_details` set `dependences_daughters`='3 or Above Adult(Un-Married)' where `dependences_daughters`='3 or Above Adult (Un-married)';
update  `guzara_allowance_mustahiqeen_details` set `dependences_daughters`='3 or Above Adult(Un-Married)' where `dependences_daughters`='3 or Above Adult (Un-married)';
update  `guzara_allowance_mustahiqeen_details` set `dependences_daughters`='None' where `dependences_daughters`='Select--';
update  `guzara_allowance_mustahiqeen_details` set `dependences_daughters`='None' where `dependences_daughters`='--????? ????--';
UPDATE guzara_allowance_mustahiqeen_details t1 INNER JOIN guzara_allowance_mustahiqeen t2 ON t1.user_id = t2.id SET t1.District_Name = t2.district_name;
SELECT `District_Name`,`dependences_daughters`, count(*) FROM `guzara_allowance_mustahiqeen_details` group  by `District_Name`,`dependences_daughters`;
SELECT * FROM `guzara_allowance_mustahiqeen_details` where user_id not in (select id from guzara_allowance_mustahiqeen)

SELECT * FROM `guzara_allowance_mustahiqeen` where (category='Disable' or category='Widow')  and  id in (select user_id from guzara_allowance_mustahiqeen_details where `dependences_daughters`='3 or Above Adult(Un-Married)')update guzara_allowance_mustahiqeen set total_marks=total_marks+5 where Device='Mobile' and id in (select user_id from guzara_allowance_mustahiqeen_details where Device='Mobile' and `dependences_daughters`='3 or Above Adult(Un-Married)')



************** UPDATE PRIORITY *************************

update guzara_allowance_mustahiqeen set Priority=6 where category='Disable';
update guzara_allowance_mustahiqeen set Priority=5 where category='Widow';
update guzara_allowance_mustahiqeen set Priority=4 where category='Orphan';
update guzara_allowance_mustahiqeen set Priority=3 where no_of_dependences = '4-6' or no_of_dependences='Above 7';
update guzara_allowance_mustahiqeen set Priority=2 where age>=70;
update guzara_allowance_mustahiqeen set Priority=1 where category='Poor';

update guzara_allowance_mustahiqeen set Priority=6 where category='Disable' and district_id=12;
update guzara_allowance_mustahiqeen set Priority=5 where category='Widow' and  district_id=12;
update guzara_allowance_mustahiqeen set Priority=4 where category='Orphan' and  district_id=12;
update guzara_allowance_mustahiqeen set Priority=3 where category='Poor' and  district_id=12;

update guzara_allowance_mustahiqeen set Priority=6 where category='Disable' and `LZC_name`not in (select lzc_institution_madrasa from dist_head_wise_fund);
update guzara_allowance_mustahiqeen set Priority=5 where category='Widow' and `LZC_name` not in (select lzc_institution_madrasa from dist_head_wise_fund);
update guzara_allowance_mustahiqeen set Priority=4 where category='Orphan' and `LZC_name` not in (select lzc_institution_madrasa from dist_head_wise_fund);
update guzara_allowance_mustahiqeen set Priority=3 where category='Poor' and `LZC_name` not in (select lzc_institution_madrasa from dist_head_wise_fund);


update guzara_allowance_mustahiqeen set Priority=3 where category='Poor' and `LZC_name` not in (select lzc_institution_madrasa from dist_head_wise_fund);


lzc_populatuoin/district population*NOBshare


