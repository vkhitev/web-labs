function randomIntInc (low, high) {
  return Math.floor(Math.random() * (high - low + 1) + low)
}

function getRandomStudents (amount) {
  let retval = []
  for (let i = 0; i < amount; i++) {
    const region = randomIntInc(1, 24)
    const form = randomIntInc(2, 12)
    const mark1 = randomIntInc(1, 12)
    const mark2 = randomIntInc(1, 12)
    const mark3 = randomIntInc(1, 12)
    retval[i] = { region, form, mark1, mark2, mark3 }
  }
  return retval
}

exports.getRandomStudents = getRandomStudents
