'use strict'

module.exports = {
  up: function (queryInterface, Sequelize) {
    return queryInterface.addColumn('Student', 'mark_mean', {
      type: Sequelize.FLOAT,
      validate: { min: 1, max: 12 },
      allowNull: true
    })
  },

  down: function (queryInterface, Sequelize) {
    /*
      Add reverting commands here.
      Return a promise to correctly handle asynchronicity.

      Example:
      return queryInterface.dropTable('users')
    */
  }
}
