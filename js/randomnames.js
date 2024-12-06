const names = ['Sillystrawberry', 'Lazylizzard', 'potatoeater', 'wonkyworm', 'trustytango', 'cupidlove', 'bookworm', 'bananamonkey', 'figsfrenzy', 'cheetahcheet', 'crazychick'];

function generateRandomName() {
    const randomIndex = Math.floor(Math.random() * names.length);
    const randomName = names[randomIndex];

    // Set the value of the hidden input field
    document.getElementById('Username').value = randomName;

    // Display the generated name in the 'random-name' div
    document.getElementById('random-name').textContent = randomName;
}
