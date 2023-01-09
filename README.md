# NEO_BACK DOCUMENTATION

## Routes

---

### AGENCY ROUTES

return all the agencies

`{url}/agency`

return an agency by it’s id via GET method

`{url}/agency?id=1`

*information required:*

> id int
> 

return an agency by it’s planet id via GET method

`{url}/agency?planet=1`

*information required:*

> planet int
> 

add a new agency by providing informations via POST method

`{url}/add-agency`

*information required:*

> email string
pwd string,
ceo_name string,
tel int,
website string,
logo string,
id_planet int
> 

modify an agency by providing it’s id and informations via POST method

`{url}/modify-agency`

*informations required:*

> id int
email string,
pwd string,
ceo_name string,
tel int,
website string,
logo string,
id_planet int
> 

delete an agency by providing it’s id via GET method

`{url}/delete-agency`

*information required:*

> id int
> 

---

### CANDIDATE ROUTES

return all the candidates

`{url}/candidate`

return a candidate by it’s id via GET method

`{url}/candidate`

information required:

> id int
> 

return candidates by job_offers via GET method

`{url}/candidate`

information required:

> offer int
> 

create a candidate by providing information via POST method

`{url}/add-candidate`

information required:

> name string
email string,
pwd string,
id_planet int,
tel int,
avatar string,
cv string
> 

modify a candidate by by providing it’s id and informations via POST method

`{url}/modify-candidate`

information required:

> id int
name string,
email string,
pwd string,
tel int,
avatar string,
cv string,
id_planet int
> 

delete a candidate by it’s id via GET method

`{url}/delete-candidate`

information required:

> id int
> 

---

### JOB ROUTES

return all jobs

`{url}/job`

return a job offer by it’s id

`{url}/job`

information required:

> id int
> 

return a job offer by it’s candidate

`{url}/job`

information required:

> id int
> 

---

### PLANET ROUTES

return all planets

`{url}/planet`

return a planet by providing it’s id via GET method

`{url}/job`

information required:

> id int
>
