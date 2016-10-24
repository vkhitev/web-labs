'use strict'

// No NULL check (!)
const updateMeanQuery = `
UPDATE STUDENT
  SET MARK_MEAN = (MARK1 + MARK2 + MARK3) / 3
`

module.exports = {
  up: function (queryInterface, Sequelize) {
    return Promise.resolve().then(() => {
      return queryInterface.sequelize.query(updateMeanQuery)
    }).then(() => {
      console.log('Data was written to database.')
    }).catch((err) => {
      return console.error(err)
    })
  },

  down: function (queryInterface, Sequelize) {
    /*
      Add reverting commands here.
      Return a promise to correctly handle asynchronicity.

      Example:
      return queryInterface.bulkDelete('Person', null, {})
    */
  }
}
