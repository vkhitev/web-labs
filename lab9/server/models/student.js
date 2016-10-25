'use strict'
module.exports = function (sequelize, DataTypes) {
  var Student = sequelize.define('Student', {
    region: {
      type: DataTypes.INTEGER,
      validate: { min: 0 }
    },
    form: {
      type: DataTypes.INTEGER,
      validate: { min: 2, max: 12 }
    },
    mark1: {
      type: DataTypes.INTEGER,
      validate: { min: 1, max: 12 }
    },
    mark2: {
      type: DataTypes.INTEGER,
      validate: { min: 1, max: 12 }
    },
    mark3: {
      type: DataTypes.INTEGER,
      validate: { min: 1, max: 12 }
    },
    mark_mean: {
      type: DataTypes.FLOAT,
      validate: { min: 1, max: 12 }
    }
  })
  return Student
}
