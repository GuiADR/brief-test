# Desafio Brief

## 🛠 Getting started

- You must first clone the repository using your terminal
```zsh
git clone https://github.com/GuiADR/brief-test
```
 -  or download the zip from the green button at the beginning of the repository

<img src="https://i.ibb.co/3mLnKMH/clone.png" alt="Download zip" border="0">

- Then you must navigate through the terminal into the repository folder and install the dependencies through the composer
```zsh
cd path_folder
$path_folder composer install
```

- If you have already cloned the repository in the wordpress plug-ins folder, all you need to do now is activate the plug-in, otherwise copy the folder to the wordpress plug-ins folder or create a zip (now with dependencies ) and install in the wordpress admin panel 



## Endpoints

>Create a member => **[POST]** wp-json/api/member
>```json
>//request body - json
>{
>	"name": "string",
>	"email":"string",
>	"birthday":"date",
>	"gender":"string"
>}
>```
> List members => **[GET]** wp-json/api/member
>```json
>//no body
>```
> Delete a member => **[DELETE]** wp-json/api/member/{id}
>```json
>//no body
>```
> Update a member => **[PUT]** wp-json/api/member{id}
>```json
>//request body - json
>{
>	"name": "string",
>	"email":"string",
>	"birthday":"date",
>	"gender":"string"
>}
>```
> View a member => **[GET]** wp-json/api/member{id}<br>
>```json
>//no body
>```
><br>
## Archive page
- Automatically generated, the link is **/teams-members**
  - You still have to go to settings, permalinks, check the post name and save
- The table with the members follows the pattern of the theme of appearance of the site