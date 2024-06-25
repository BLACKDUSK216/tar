document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    const positionId = urlParams.get('positionId');

    if (positionId) {
        moveIconToSavedPosition(positionId);
    }
});

function moveIconToSavedPosition(positionId) {
    const iconContainer = document.getElementById('iconContainer');

    fetch(`get_position.php?positionId=${positionId}`)
        .then(response => response.json())
        .then(data => {
            iconContainer.style.gridRow = data.row;
            iconContainer.style.gridColumn = data.column;
        })
        .catch(error => console.error('Error fetching position:', error));
}

let currentGridIndex = 0;
const iconContainer = document.getElementById('iconContainer');

function moveIcon() {
    const selectedDirection = document.getElementById('direction').value;
    const selectedSpaces = parseInt(document.getElementById('spaces').value, 10);

    if (selectedSpaces > 5) {
        alert('Error: Spaces value should be 1 to 5.');
        return;
    }

    for (let i = 0; i < selectedSpaces; i++) {
        setTimeout(() => {
            switch (selectedDirection) {
                case 'up':
                    currentGridIndex = (currentGridIndex - 5 + 30) % 30;
                    break;
                case 'down':
                    currentGridIndex = (currentGridIndex + 5) % 30;
                    break;
                case 'left':
                    currentGridIndex = (currentGridIndex - 1 + 30) % 30;
                    break;
                case 'right':
                    currentGridIndex = (currentGridIndex + 1) % 30;
                    break;
                default:
                    break;
            }

            iconContainer.style.gridArea = `${Math.floor(currentGridIndex / 5) + 1} / ${(currentGridIndex % 5) + 1} / span 1 / span 1`;

            iconContainer.classList.add('hop');
            setTimeout(() => {
                iconContainer.classList.remove('hop');
            }, 500);
        }, i * 600);
    }
}

function generateGridItems() {
    const gridContainer = document.getElementById('gridContainer');

    for (let i = 1; i <= 29; i++) {
        const gridItem = document.createElement('div');
        gridItem.className = 'grid-item';
        gridContainer.appendChild(gridItem);
    }
}

generateGridItems();

function saveIconPosition() {
    const iconPosition = iconContainer.style.gridArea;
    console.log('Icon Position:', iconPosition);
    saveIconPositionToDatabase(iconPosition);
}

function saveIconPositionToDatabase(position) {
    const data = {
        position: position,
    };

    fetch('save-icon-position.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(result => {
        if (result.success) {
            console.log('Icon position saved successfully!');
            alert('Icon position saved successfully!');
        } else {
            console.error('Error saving icon position:', result.error);
            alert('Error saving icon position. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An unexpected error occurred while saving the icon position.');
    });
}

function viewSavedPositions() {
    window.location.href = 'fetch-saved-positions.php';
}
