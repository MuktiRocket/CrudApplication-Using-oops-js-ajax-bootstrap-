const addform = document.getElementById("add-user-form");
const updateform = document.getElementById("edit-user-form")
const showAlert = document.getElementById("showAlert");
const addModal = new bootstrap.Modal(document.getElementById("addNewUserModal"));
const editModal = new bootstrap.Modal(document.getElementById("editUserModal"));
const tbody = document.querySelector('tbody');



//add new user ajax request

addform.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formdata = new FormData(addform);

    formdata.append("add", 1);

    if (addform.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        addform.classList.add("was-validated");
        return false;
    }
    else {
        document.getElementById('add-user-btn').value = 'Please Wait ...';
        const data = await fetch("action.php", {
            method: "POST",
            body: formdata,
        });
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById('add-user-btn').value = "Add User";
        addform.reset();
        addform.classList.remove("was-validated");
        addModal.hide();
        fetchAllUsers();
    }

});

//fetch all users ajax request;



const fetchAllUsers = async () => {
    const data = await fetch("action.php?read=1", {
        method: "GET",
    });
    const response = await data.text();
    tbody.innerHTML = response;
};
fetchAllUsers();


//Edit ajax request



tbody.addEventListener("click", (e) => {

    if (e.target && e.target.matches("a.editLink")) {
        e.preventDefault();
        let id = e.target.getAttribute("id");
        editUser(id);
    }

});

const editUser = async (id) => {


    const data = await fetch(`action.php?edit=1&id=${id}`, {
        method: "GET",
    });
    const response = await data.json();
    document.getElementById("id").value = response.id;
    document.getElementById("fname").value = response.first_name;
    document.getElementById("lname").value = response.last_name;
    document.getElementById("email").value = response.email;
    document.getElementById("phone").value = response.phone;
};


//update user ajax request

updateform.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formdata = new FormData(updateform);

    formdata.append("update", 1);

    if (updateform.checkValidity() === false) {
        e.preventDefault();
        e.stopPropagation();
        updateform.classList.add("was-validated");
        return false;
    }
    else {
        document.getElementById('edit-user-btn').value = 'Please Wait ...';
        const data = await fetch("action.php", {
            method: "POST",
            body: formdata,
        });
        const response = await data.text();
        showAlert.innerHTML = response;
        document.getElementById('edit-user-btn').value = "Add User";
        updateform.reset();
        updateform.classList.remove("was-validated");
        editModal.hide();
        fetchAllUsers();
    }
});



//Delete ajax request

tbody.addEventListener("click", (e) => {

    if (e.target && e.target.matches("a.deleteLink")) {
        e.preventDefault();
        let id = e.target.getAttribute("id");
        deleteUser(id);
    }
});

const deleteUser = async (id) => {
    const data = await fetch(`action.php?delete=1&id=${id}`, {
        method: "GET",
    });
    const response = await data.text();
    showAlert.innerHTML = response;
    fetchAllUsers();
}