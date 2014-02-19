# select upcoming concerts in english (language.id = 1)
select 
c.id as id, 
c.title as title, 
cd.text as description,
v.name as venue,
c.datetime as datetime, 
cin.name as city, 
con.name as country, 
#l.name as language 
from concert c 
inner join venue v on c.venue = v.id 
inner join city ci on v.city = ci.id 
inner join country co on ci.country = co.id 
inner join cityName cin on cin.city = ci.id 
inner join countryName con on con.country = co.id 
inner join language l on cin.language = l.id 
inner join concertDescription cd on cd.concert = c.id
where con.language = l.id
and cin.language = l.id
and cd.language = l.id
and datetime > now() # switch upcoming (>) / past (<)
and l.id = 1; # change language